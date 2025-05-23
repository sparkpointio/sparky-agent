// SPDX-License-Identifier: MIT
pragma solidity ^0.8.22;

import "@openzeppelin/contracts/token/ERC20/IERC20.sol";
import "@openzeppelin/contracts/access/Ownable.sol";

contract TokenAccessPayment is Ownable {
    IERC20 public paymentToken;
    uint256 public price;

    mapping(address => uint256[]) public paymentHistory;

    event Paid(address indexed user, uint256 paidAt);
    event PriceUpdated(uint256 oldPrice, uint256 newPrice);
    event PaymentTokenUpdated(address oldToken, address newToken);

    constructor(address initialOwner) Ownable(initialOwner) {}

    bool private _initialized;

    function initialize(address initialOwner, address _paymentTokenAddress, uint256 _initialPrice) external {
        require(!_initialized, "Already initialized");
        _initialized = true;
        _transferOwnership(initialOwner);
        paymentToken = IERC20(_paymentTokenAddress);
        price = _initialPrice;
    }

    function pay() external {
        require(
            paymentToken.transferFrom(msg.sender, address(this), price),
            "Token payment failed"
        );

        uint256 timestamp = block.timestamp;
        paymentHistory[msg.sender].push(timestamp);
        emit Paid(msg.sender, timestamp);
    }

    function getAllPayments(address user) external view returns (uint256[] memory) {
        return paymentHistory[user];
    }

    function updatePrice(uint256 newPrice) external onlyOwner {
        require(newPrice > 0, "Price must be greater than 0");
        uint256 oldPrice = price;
        price = newPrice;
        emit PriceUpdated(oldPrice, newPrice);
    }

    function updatePaymentToken(address newToken) external onlyOwner {
        require(newToken != address(0), "Invalid token address");
        address oldToken = address(paymentToken);
        paymentToken = IERC20(newToken);
        emit PaymentTokenUpdated(oldToken, newToken);
    }

    function withdraw(address to, uint256 amount) external onlyOwner {
        require(paymentToken.transfer(to, amount), "Withdraw failed");
    }
}
