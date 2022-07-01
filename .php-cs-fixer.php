<?php

$finder = Symfony\Component\Finder\Finder::create()
    ->notPath('assets/*')
	->notPath('vendor')
	->in([
        __DIR__,
    ])
    ->name('*.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

	return (new PhpCsFixer\Config())
		->setRules([
			'@PSR12' => true,
		])
	    ->setLineEnding("\n")
	    ->setIndent(str_repeat(' ', 4))
	    ->setUsingCache(false)
	    ->setRiskyAllowed(true)
	    ->setFinder($finder);
