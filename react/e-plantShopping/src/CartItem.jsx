import React, { useState } from "react";
import { useSelector, useDispatch } from "react-redux";
import { removeItem, updateQuantity, clearCart } from "./CartSlice";
import "./CartItem.css";

const CartItem = ({ onContinueShopping }) => {
  const cart = useSelector((state) => state.cart.items);
  const dispatch = useDispatch();
  // Order summary shown after checkout (null = no order placed yet)
  const [orderPlaced, setOrderPlaced] = useState(null);

  // Calculate total amount for all products in the cart
  const calculateTotalAmount = () => {
    let total = 0; // Running sum of all items
    cart.forEach((item) => {
      const cost = parseFloat(item.cost.substring(1)); // "$15" -> 15
      total += cost * item.quantity;
    });
    return total;
  };

  const handleContinueShopping = (e) => {
    onContinueShopping(e); // Ask the parent (ProductList) to hide the cart
  };

  const handleCheckoutShopping = () => {
    if (cart.length === 0) return; // Nothing to buy

    // 1. Save a summary BEFORE clearing, because the cart will be empty after
    let itemCount = 0;
    cart.forEach((item) => {
      itemCount += item.quantity;
    });
    setOrderPlaced({ itemCount, total: calculateTotalAmount() });

    // 2. Empty the cart in the Redux store
    dispatch(clearCart());
  };

  const handleIncrement = (item) => {};

  const handleDecrement = (item) => {};

  const handleRemove = (item) => {};

  // Calculate total cost based on quantity for an item
  const calculateTotalCost = (item) => {};

  // After checkout, show a confirmation screen instead of the cart
  if (orderPlaced) {
    return (
      <div className="cart-container">
        <h2 style={{ color: "black" }}>Thank you for your order! 🌱</h2>
        <p style={{ color: "black" }}>
          You ordered {orderPlaced.itemCount} plant(s) for a total of $
          {orderPlaced.total}.
        </p>
        <div className="continue_shopping_btn">
          <button
            className="get-started-button"
            onClick={(e) => handleContinueShopping(e)}
          >
            Continue Shopping
          </button>
        </div>
      </div>
    );
  }

  return (
    <div className="cart-container">
      <h2 style={{ color: "black" }}>
        Total Cart Amount: ${calculateTotalAmount()}
      </h2>
      <div>
        {cart.map((item) => (
          <div className="cart-item" key={item.name}>
            <img className="cart-item-image" src={item.image} alt={item.name} />
            <div className="cart-item-details">
              <div className="cart-item-name">{item.name}</div>
              <div className="cart-item-cost">{item.cost}</div>
              <div className="cart-item-quantity">
                <button
                  className="cart-item-button cart-item-button-dec"
                  onClick={() => handleDecrement(item)}
                >
                  -
                </button>
                <span className="cart-item-quantity-value">
                  {item.quantity}
                </span>
                <button
                  className="cart-item-button cart-item-button-inc"
                  onClick={() => handleIncrement(item)}
                >
                  +
                </button>
              </div>
              <div className="cart-item-total">
                Total: ${calculateTotalCost(item)}
              </div>
              <button
                className="cart-item-delete"
                onClick={() => handleRemove(item)}
              >
                Delete
              </button>
            </div>
          </div>
        ))}
      </div>
      <div
        style={{ marginTop: "20px", color: "black" }}
        className="total_cart_amount"
      ></div>
      <div className="continue_shopping_btn">
        <button
          className="get-started-button"
          onClick={(e) => handleContinueShopping(e)}
        >
          Continue Shopping
        </button>
        <br />
        <button
          className="get-started-button1"
          onClick={handleCheckoutShopping}
          disabled={cart.length === 0}
        >
          Checkout
        </button>
      </div>
    </div>
  );
};

export default CartItem;
