<?php

namespace App\Entity;

use App\Entity\AbstractEntity;
use App\Repository\HabitLogRepository;

/**Classe qui représente une habitude suivie par un utilisateur.
 * Elle inclut des méthodes pour récupérer les informations de l'habitude, et pour vérifier si elle est complète
*/
class Habit extends AbstractEntity
{
    /** Identifiant unique de l'utilisateur qui est relié à cette habit
     * @var int
     */
    private $user_id;

    /** nom de l'habit
     * @var string
     */
    private $name;

    /** Description de l'habit
     * @var string
     */
    private $description;

    /** Date de création de l'habit
     * @var string
     */
    private $created_at;

    public function getUserId()
    {
        return $this->user_id;
    }

    /** Indiquer l'identifiant de l'utilisateur
     * @param int $user_id
    */
    public function setUserId($user_id): self
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    /** Indiquer le nom de l'habit
     * @param string $name
    */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    /** Indiquer la description de l'habit
     * @param string $description
    */
    public function setDescription($description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at): self
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * Vérifie si l'habitude est complétée aujourd'hui
     */
    public function isCompletedToday(): bool
    {
        $habitLogRepository = new HabitLogRepository();
        return $habitLogRepository->isCompletedToday($this->getId());
    }


    /**
     * Calcule le pourcentage de complétion sur les 7 derniers jours
     */
    public function getProgress(int $days = 7): int
    {
        $habitLogRepository = new HabitLogRepository();
        $completedDays = $habitLogRepository->countCompletedLastDays($this->getId(), $days);

        return (int)round(($completedDays / $days) * 100);
    }
}
