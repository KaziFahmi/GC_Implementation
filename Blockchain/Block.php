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
    public $type;
    public $value;
    public $number;
    public $previousHash;
    public $nonce;
  
    // Constructor with default values
    public function __construct(int $number = 0, string $previousHash = ZERO_STRING, string $type = null, $value = null, $person_involved = null, int $nonce = 0) {
        $this->type = $type;
        $this->value = $value;
        $this->person_involved = $person_involved;
        $this->number = $number;
        $this->previousHash = $previousHash;
        $this->nonce = $nonce;
    }
  
    // Function to calculate the block's hash
    public function hash(): string {
        return sha256_hash(
            $this->number,
            $this->previousHash,
            $this->type,
            $this->value,
            $this->person_involved = $person_involved,
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

?>