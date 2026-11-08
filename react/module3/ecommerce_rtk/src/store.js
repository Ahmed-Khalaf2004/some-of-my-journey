import { configureStore } from "@reduxjs/toolkit";
import CartSlice from "./Components/CartSlice.jsx";
const store = configureStore({
    reducer: {
        cart: CartSlice
    }
})
export default store;