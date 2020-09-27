<?php

namespace App\Command;

use App\Entity\Product;
use App\Repository\AttributeRepository;
use App\Repository\AttributeSetRepository;
use App\Repository\MarketplaceRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportSampleProductCommand extends Command
{
    protected static $defaultName = 'import:sample-product';

    protected $attributeSetRepository;
    protected $attributeRepository;
    protected $entityManager;
    protected $marketplaceRepository;

    public function __construct(
        MarketplaceRepository $marketplaceRepository,
        AttributeSetRepository $attributeSetRepository,
        AttributeRepository $attributeRepository,
        EntityManagerInterface $entityManager
    )
    {
        parent::__construct();

        $this->marketplaceRepository = $marketplaceRepository;
        $this->attributeSetRepository = $attributeSetRepository;
        $this->attributeRepository = $attributeRepository;
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this->setDescription('Import a sample product into the EAV structure');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $marketplace = $this->marketplaceRepository->findOneBy(["name" => "Website"]);
        $attributeSet = $this->attributeSetRepository->findOneBy(["name" => "Default"]);

        $keyedAttributes = [];
        $keyedAttributeOptions = [];

        foreach ($attributeSet->getGroups() as $attributeGroup) {
            foreach ($attributeGroup->getAttributes() as $attribute) {
                $keyedAttributes[$attribute->getCode()] = $attribute;

                if ("select" === $attribute->getInputType()) {
                    $options = $attribute->getOptions();
                    foreach ($options as $option) {
                        $keyedAttributeOptions[$attribute->getCode()][$option->getName()] = $option;
                    }
                }
            }
        }

        $product = new Product();
        $product->setAttributeSet($attributeSet);
        $product->setType(1);

        $this->entityManager->persist($product);
        $this->entityManager->flush();

        $this->entityManager->getConnection()->executeStatement(
            "INSERT INTO product_attribute_varchar (marketplace_id, product_id, attribute_id, value) VALUES (?, ?, ?, ?)",
            [
                $marketplace->getId(),
                $product->getId(),
                $keyedAttributes["name"]->getId(),
                "Glasses Case"
            ]
        );

        $this->entityManager->getConnection()->executeStatement(
            "INSERT INTO product_attribute_text (marketplace_id, product_id, attribute_id, value) VALUES (?, ?, ?, ?)",
            [
                $marketplace->getId(),
                $product->getId(),
                $keyedAttributes["short_description"]->getId(),
                "This is a glasses case"
            ]
        );

        $this->entityManager->getConnection()->executeStatement(
            "INSERT INTO product_attribute_text (marketplace_id, product_id, attribute_id, value) VALUES (?, ?, ?, ?)",
            [
                $marketplace->getId(),
                $product->getId(),
                $keyedAttributes["description"]->getId(),
                "This is a glasses case made of plastic"
            ]
        );

        $this->entityManager->getConnection()->executeStatement(
            "INSERT INTO product_attribute_int (product_id, attribute_id, value) VALUES (?, ?, ?)",
            [
                $product->getId(),
                $keyedAttributes["size"]->getId(),
                $keyedAttributeOptions["size"]["S"]->getId(),
            ]
        );

        $this->entityManager->getConnection()->executeStatement(
            "INSERT INTO product_attribute_int (product_id, attribute_id, value) VALUES (?, ?, ?)",
            [
                $product->getId(),
                $keyedAttributes["colour"]->getId(),
                $keyedAttributeOptions["colour"]["Orange"]->getId(),
            ]
        );

        return Command::SUCCESS;
    }
}
