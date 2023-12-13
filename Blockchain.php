<?php 
define('ZERO_STRING', str_repeat('0', 64));
// Use the built-in hash function for SHA256
function sha256_hash(...$args) {
    $hash_text = "";
  
    foreach ($args as $arg) {
      $hash_text .= (string)$arg;
    }
  
    $hash = hash("sha256", $hash_text);
  
    return $hash;
  }
  
  // Class representing a block in the blockchain
  class Block {
    public $data;
    public $number;
    public $previousHash;
    public $nonce;
  
    // Constructor with default values
    public function __construct(int $number = 0, string $previousHash = ZERO_STRING, string $data = null, int $nonce = 0) {
      $this->data = $data;
      $this->number = $number;
      $this->previousHash = $previousHash;
      $this->nonce = $nonce;
    }
  
    // Function to calculate the block's hash
    public function hash(): string {
      return sha256_hash(
        $this->number,
        $this->previousHash,
        $this->data,
        $this->nonce
      );
    }
  
    // String representation of the block for debugging
    public function __toString(): string {
      return "Block # " . $this->number . "\n<br>" .
        "Hash: " . $this->hash() . "\n<br>" .
        "Previous: " . $this->previousHash . "\n<br>" .
        "Data: " . $this->data . "\n<br>" .
        "Nonce: " . $this->nonce . "\n<br>";
    }
  }

  class Blockchain {

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
      try {
        // Set previous hash based on the previous block
        $previousHash = end($this->chain);
        if($previousHash != FALSE){
            $block->previousHash = $previousHash->hash();
        }
      } catch (Exception $e) {
        // Ignore error if it's the first block
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