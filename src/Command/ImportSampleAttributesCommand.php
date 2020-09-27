<?php

namespace App\Command;

use App\Entity\Attribute;
use App\Entity\AttributeGroup;
use App\Entity\AttributeOption;
use App\Entity\AttributeSet;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ImportSampleAttributesCommand extends Command
{
    protected static $defaultName = 'import:sample-attributes';

    protected $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure()
    {
        $this->setDescription('Import some basic sample attributes into the database');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $nameAttribute = $this->createAttribute("Name", "name", "varchar", "textfield");
        $this->entityManager->persist($nameAttribute);

        $shortDescriptionAttribute = $this->createAttribute("Short Description", "short_description", "text", "textarea");
        $this->entityManager->persist($nameAttribute);

        $descriptionAttribute = $this->createAttribute("Description", "description", "text", "textarea");
        $this->entityManager->persist($nameAttribute);

        $sizeAttribute = $this->createAttribute("Size", "size", "int", "select");
        $this->createAttributeOptions($sizeAttribute, [
            "XS",
            "S",
            "M",
            "L",
            "XL",
            "XXL",
        ]);
        $this->entityManager->persist($sizeAttribute);

        $colourAttribute = $this->createAttribute("Colour", "colour", "int", "select");
        $this->createAttributeOptions($colourAttribute, [
            "Black",
            "Blue",
            "Orange",
            "White",
        ]);
        $this->entityManager->persist($colourAttribute);

        $attributeSet = new AttributeSet();
        $attributeSet->setName("Default");

        $commonAttributeGroup = new AttributeGroup();
        $commonAttributeGroup->setName("Common Attributes");
        $attributeSet->addGroup($commonAttributeGroup);

        $commonAttributeGroup->addAttribute($nameAttribute);
        $commonAttributeGroup->addAttribute($shortDescriptionAttribute);
        $commonAttributeGroup->addAttribute($descriptionAttribute);
        $commonAttributeGroup->addAttribute($sizeAttribute);
        $commonAttributeGroup->addAttribute($colourAttribute);

        $this->entityManager->persist($attributeSet);
        $this->entityManager->flush();

        return Command::SUCCESS;
    }

    protected function createAttribute(string $name, string $code, string $dataType, string $inputType) : Attribute
    {
        $attribute = new Attribute();

        $attribute->setName($name);
        $attribute->setCode($code);
        $attribute->setDataType($dataType);
        $attribute->setInputType($inputType);

        return $attribute;
    }

    protected function createAttributeOptions(Attribute $attribute, array $options)
    {
        foreach($options as $name) {
            $option = new AttributeOption();
            $option->setName($name);
            $attribute->addOption($option);
        }
    }
}

