<?php
namespace Bookdown\Bookdown\Processor;

use Bookdown\Bookdown\Content\RootPage;

class Processor
{
    protected $processors;

    public function __construct(array $processors = null)
    {
        $this->processors = $processors;
    }

    public function __invoke(RootPage $root)
    {
        foreach ($this->processors as $processor) {
            $page = $root;
            while ($page) {
                $processor($page);
                $page = $page->getNext();
            }
        }
    }
}