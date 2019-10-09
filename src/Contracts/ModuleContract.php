<?php

namespace Click\Elemental\Contracts;

interface ModuleContract
{
    /**
     * @return string
     */
    public function getAlias();

    /**
     * @return string
     */
    public function getName();

    /**
     * @return string
     */
    public function getDescription();

    /**
     * @return string
     */
    public function getAuthor();

    /**
     * @return array
     */
    public function getElements();
}