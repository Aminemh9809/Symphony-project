<?php

namespace App\Entity;

use App\Repository\BidsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BidsRepository::class)]
class Bids
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $auction_id = null;

    #[ORM\Column]
    private ?int $user_id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $bid_amount = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $bid_time = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuctionId(): ?int
    {
        return $this->auction_id;
    }

    public function setAuctionId(int $auction_id): static
    {
        $this->auction_id = $auction_id;

        return $this;
    }

    public function getUserId(): ?int
    {
        return $this->user_id;
    }

    public function setUserId(int $user_id): static
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getBidAmount(): ?string
    {
        return $this->bid_amount;
    }

    public function setBidAmount(string $bid_amount): static
    {
        $this->bid_amount = $bid_amount;

        return $this;
    }

    public function getBidTime(): ?\DateTimeInterface
    {
        return $this->bid_time;
    }

    public function setBidTime(?\DateTimeInterface $bid_time): static
    {
        $this->bid_time = $bid_time;

        return $this;
    }
}
