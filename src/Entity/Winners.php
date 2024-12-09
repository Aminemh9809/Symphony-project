<?php

namespace App\Entity;

use App\Repository\WinnersRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WinnersRepository::class)]
class Winners
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $auction_id = null;

    #[ORM\Column]
    private ?int $winner_id = null;

    #[ORM\Column]
    private ?int $winning_bid_id = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 5, scale: 2, nullable: true)]
    private ?string $winning_price = null;

    #[ORM\Column(type: Types::SMALLINT, nullable: true)]
    private ?int $winner_confirmed = null;

    #[ORM\Column(length: 50, nullable: true)]
    private ?string $payment_status = null;

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

    public function getWinnerId(): ?int
    {
        return $this->winner_id;
    }

    public function setWinnerId(int $winner_id): static
    {
        $this->winner_id = $winner_id;

        return $this;
    }

    public function getWinningBidId(): ?int
    {
        return $this->winning_bid_id;
    }

    public function setWinningBidId(int $winning_bid_id): static
    {
        $this->winning_bid_id = $winning_bid_id;

        return $this;
    }

    public function getWinningPrice(): ?string
    {
        return $this->winning_price;
    }

    public function setWinningPrice(?string $winning_price): static
    {
        $this->winning_price = $winning_price;

        return $this;
    }

    public function getWinnerConfirmed(): ?int
    {
        return $this->winner_confirmed;
    }

    public function setWinnerConfirmed(?int $winner_confirmed): static
    {
        $this->winner_confirmed = $winner_confirmed;

        return $this;
    }

    public function getPaymentStatus(): ?string
    {
        return $this->payment_status;
    }

    public function setPaymentStatus(?string $payment_status): static
    {
        $this->payment_status = $payment_status;

        return $this;
    }
}
