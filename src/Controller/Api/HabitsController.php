<?php

namespace App\Controller\Api;

use App\Repository\HabitRepository;
use Mns\Buggy\Core\AbstractController;
use OpenApi\Attributes as OAT;

class HabitsController extends AbstractController
{
    private HabitRepository $habitRepository;

    public function __construct()
    {
        $this->habitRepository = new HabitRepository();
    }

    #[OAT\Get(path: '/api/habit.json')]
    #[OAT\Response(response: '200', description: 'get all habit')]
    public function index()
    {
        return $this->json([
            'tickets' => $this->habitRepository->findAll()
        ]);
    }

}