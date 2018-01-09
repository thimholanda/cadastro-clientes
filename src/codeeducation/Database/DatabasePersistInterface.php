<?php

namespace codeeducation\Database;


interface DatabasePersistInterface
{
    public function persist(DatabaseModelInterface $model);

    public function flush();
}