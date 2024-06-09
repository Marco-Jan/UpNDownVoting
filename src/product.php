<?php

class Product
{
  readonly string $id;
  readonly string $file_name;
  public string $title;
  private int $upvotes;
  private int $downvotes;

  public function __construct(int $upvotes = 0, int $downvotes = 0) {
      $this->upvotes = $upvotes;
      $this->downvotes = $downvotes;
  }

  public function getSrc(): string
  {
    return "uploads/img/$this->file_name";
  }

  public function getUpvotes(): int
  {
    return $this->upvotes;
  }

  public function getDownvotes(): int
  {
    return $this->downvotes;
  }
}