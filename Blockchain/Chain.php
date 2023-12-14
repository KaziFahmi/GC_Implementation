<?php 
require_once 'Block.php';
  class Chain {  

    // Difficulty for mining (number of leading zeros)
    public $difficulty = 4;
  
    // Chain containing all blocks
    public $chain = [];
  
    // Initializes or resets the blockchain
    public function __construct() {
      $this->chain = [];
    }
  
    // Adds a block to the chain
    public function add(Block $block) {
      array_push($this->chain, $block);
    }
  
    // Removes a block from the chain
    public function remove(Block $block) {
      $index = array_search($block, $this->chain, true);
      if ($index !== false) {
        unset($this->chain[$index]);
      }
    }
  
    // Mines a block and adds it to the chain
    public function mine(Block $block) {
      // Set the block number
      $block->number = count($this->chain)+1;
      $previousBlock = end($this->chain);
      if($previousBlock != FALSE){
        $block->previousHash = $previousBlock->hash();
      }
      // Loop until a valid hash is found
      while (true) {
        $hash = $block->hash();
        if (substr($hash, 0, $this->difficulty) === str_repeat("0", $this->difficulty)) {
          $this->add($block);
          break;
        } else {
          $block->nonce++;
        }
      }
    }
  
    // Checks the validity of the blockchain
    public function isValid(): bool {
      for ($i = 1; $i < count($this->chain); $i++) {
        $previousHash = $this->chain[$i]->previousHash;
        $currentHash = $this->chain[$i - 1]->hash();
  
        if ($previousHash !== $currentHash || substr($currentHash, 0, $this->difficulty) !== str_repeat("0", $this->difficulty)) {
          return false;
        }
      }
  
      return true;
    }
  }

?>