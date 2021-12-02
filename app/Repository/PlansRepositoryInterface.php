<?php
namespace App\Repository;

use App\Plans;
use Illuminate\Support\Collection;

interface PlansRepositoryInterface
{
   public function all(): Collection;
}
