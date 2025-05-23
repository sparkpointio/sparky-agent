import hre from "hardhat";
import {PRIVATE_KEY, RPC_URL} from "./arguments/blockchainArgs.js"
import {initialOwner, paymentTokenAddress, initialPrice} from "./arguments/tokenAccessPaymentArgs.js";
// import {ethers} from "ethers";

(async () => {
  try {
    if (!PRIVATE_KEY) {
      throw new Error("Missing environment variable: PRIVATE_KEY");
    }

    // const { ethers } = require("hardhat");
    //
    // const [deployer, address1, address2] = await ethers.getSigners();

    // const initialOwner = wallet.address;

    // =================== Deploy SRK ====================

    const TokenAccessPayment = await hre.ethers.getContractFactory("TokenAccessPayment");

    const initData = TokenAccessPayment.interface.encodeFunctionData(
      "initialize",
      [initialOwner, paymentTokenAddress, initialPrice]
    );

    const tokenAccessPayment = await TokenAccessPayment.deploy(initialOwner);

    await tokenAccessPayment.waitForDeployment();
    console.log(`TokenAccessPayment deployed to ${tokenAccessPayment.target}`);

    // ===================================================

    // =================== Deploy ERC1967Proxy ===================
    const ERC1967Proxy = await hre.ethers.getContractFactory("contracts/proxy/ERC1967.sol:ERC1967Proxy");
    const erc1967Proxy = await ERC1967Proxy.deploy(tokenAccessPayment.target, initData);
    await erc1967Proxy.waitForDeployment();
    console.log(`TokenAccessPayment Proxy deployed to ${erc1967Proxy.target}`);
    // ===========================================================


    // =================== Initialize Contracts ===================
    TokenAccessPayment.attach(erc1967Proxy.target);
    console.log(`TokenAccessPayment initialized`);
    // ===========================================================

    // =================== Verify Contracts ====================
    if(process.env.ENV == 'staging' || process.env.ENV == 'mainnet') {
      await hre.run("verify:verify", {
        address: tokenAccessPayment.target,
        constructorArguments: [
            initialOwner
        ],
      });

      await hre.run("verify:verify", {
        address: erc1967Proxy.target,
        constructorArguments: [
          tokenAccessPayment.target,
          initData
        ],
        contract: "contracts/proxy/ERC1967.sol:ERC1967Proxy",
        sourcePath: "./contracts/proxy/ERC1967.sol" // Ensure this path is correct
      });
    }

      // =================== Test ===================
      if(process.env.ENV == 'staging') {
          console.log("")

          // const { ethers } = require('ethers');
          //
          // const SRK = await hre.ethers.getContractFactory("SRK");
          // const srk = await SRK.deploy(deployer.address, "Test", 'Test', "10000000000000000000000000000");

          // await srk.waitForDeployment();
          // console.log(`SRK deployed to ${srk.target}`);
          //
          // console.log("")

          // console.log("tokenAccessPayment.updatePrice")
          // await tokenAccessPayment.updatePrice(hre.ethers.parseUnits("50000000"));
          //
          // console.log("")
          //
          // const { MerkleTree } = require('merkletreejs');
          // const keccak256 = require('keccak256');
          //
          // // Example data (Index, Address, Amount in Wei)
          // const data = [
          //     { index: 0, address: deployer.address, amount: ethers.parseUnits("200", 18) },
          //     { index: 1, address: address2.address, amount: ethers.parseUnits("700", 18) },
          //     { index: 2, address: address2.address, amount: ethers.parseUnits("100", 18) },
          // ];
          //
          // // Create leaves with ABI encoding (MUST MATCH Solidity)
          // const leaves = data.map(item =>
          //     keccak256(
          //         ethers.solidityPacked(
          //             ["uint256", "address", "uint256"], // Matches Solidity abi.encodePacked()
          //             [item.index, item.address, item.amount]
          //         )
          //     )
          // );
          //
          // // Generate Merkle Tree
          // const tree = new MerkleTree(leaves, keccak256, { sortPairs: true });
          //
          // // Get Merkle Root
          // const root = '0x' + tree.getRoot().toString('hex');
          //
          // // Get Proof for First User
          // const leaf = leaves[0]; // First user’s hashed leaf
          // const proof = tree.getProof(leaf).map(p => '0x' + p.data.toString('hex'));
          //
          // // Verify the proof
          // const isValid = tree.verify(proof, keccak256(ethers.solidityPacked(["uint256", "address", "uint256"], [data[0].index, data[0].address, data[0].amount])), root);
          //
          // // Print Results
          // console.log('Merkle Root:', root);
          // console.log('Merkle Proof for the first user:', proof);
          // console.log('User Leaf Hash:', '0x' + leaf.toString('hex')); // Useful for debugging
          // console.log("Proof is valid:", isValid);
          //
          // console.log('sparkSelfClaim.register');
          // await sparkSelfClaim.register("0", root, srk.target, ethers.parseUnits("1000", 18))
          //
          // console.log('sparkSelfClaim.claim');
          // await sparkSelfClaim.claim("0", 0, deployer.address, ethers.parseUnits("200", 18), proof)
      }
  } catch (e) {
    console.log(e);
  }
})();
