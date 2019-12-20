<?php

return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['list' => true],
    Symfony\Bundle\TwigBundle\TwigBundle::class => ['list' => true],
    Twig\Extra\TwigExtraBundle\TwigExtraBundle::class => ['list' => true],
    Symfony\Bundle\WebProfilerBundle\WebProfilerBundle::class => ['dev' => true, 'test' => true],
    Symfony\Bundle\MonologBundle\MonologBundle::class => ['list' => true],
    Symfony\Bundle\DebugBundle\DebugBundle::class => ['dev' => true, 'test' => true],
    Doctrine\Bundle\DoctrineBundle\DoctrineBundle::class => ['list' => true],
    Doctrine\Bundle\MigrationsBundle\DoctrineMigrationsBundle::class => ['list' => true],
    Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle::class => ['list' => true],
    Symfony\Bundle\SecurityBundle\SecurityBundle::class => ['list' => true],
    Symfony\Bundle\MakerBundle\MakerBundle::class => ['dev' => true],
];
