<?php

namespace Click\Elemental\Contracts;

interface ModuleContract
{
    public function getAlias();

    public function getName();

    public function getDescription();

    public function getAuthor();
}