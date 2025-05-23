// SPDX-License-Identifier: MIT
// Compatible with OpenZeppelin Contracts ^5.0.0
pragma solidity ^0.8.22;

import {ERC20} from "@openzeppelin/contracts/token/ERC20/ERC20.sol";
import {ERC20Burnable} from "@openzeppelin/contracts/token/ERC20/extensions/ERC20Burnable.sol";
import {ERC20Permit} from "@openzeppelin/contracts/token/ERC20/extensions/ERC20Permit.sol";
import {Ownable} from "@openzeppelin/contracts/access/Ownable.sol";

contract SRK is ERC20, ERC20Burnable, ERC20Permit, Ownable {
    constructor(address initialOwner, string memory tokenName, string memory tokenSymbol, uint256 initialSupply) 
        ERC20(tokenName, tokenSymbol)
        ERC20Permit(tokenName)
        Ownable(initialOwner)
    {
        _mint(initialOwner, initialSupply);
    }
}