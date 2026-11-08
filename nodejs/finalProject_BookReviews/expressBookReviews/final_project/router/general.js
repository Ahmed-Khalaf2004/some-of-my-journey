const express = require("express");
let books = require("./booksdb.js");
let isValid = require("./auth_users.js").isValid;
let users = require("./auth_users.js").users;
const public_users = express.Router();

public_users.post("/register", (req, res) => {
  //Write your code here
  const username = req.body.username;
  const password = req.body.password;

  // Check if both username and password are provided
  if (username && password) {
    // Check if the user does not already exist
    if (!isValid(username)) {
      users.push({ username: username, password: password });
      return res.status(200).json({
        message: "Customer successfully registered. Now you can login",
      });
    } else {
      return res.status(409).json({ message: "User already exists!" });
    }
  }

  // If username or password is missing
  return res.status(400).json({
    message: "Unable to register user. Username and password are required.",
  });
});

// Get the book list available in the shop
// public_users.get("/",function (req, res) {
//   //Write your code here
//   return res.send(JSON.stringify(books, null, 4));
// });
// Task10: promises | async-awaith
// way1:
// public_users.get("/", async function (req, res) {
//   try {
//     // محاكاة طلب غير متزامن باستخدام Promise لجلب الكتب
//     const getBooks = new Promise((resolve, reject) => {
//       resolve(books);
//     });

//     const allBooks = await getBooks;
//     return res.status(200).json(allBooks);
//   } catch (error) {
//     return res
//       .status(500)
//       .json({ message: "Error fetching books", error: error.message });
//   }
// });
// way2:
// Get the book list available in the shop using Promises (.then)
public_users.get("/", function (req, res) {
  new Promise((resolve, reject) => {
    resolve(books);
  })
    .then((bookList) => {
      return res.status(200).send(JSON.stringify(bookList, null, 4));
    })
    .catch((err) => {
      return res.status(500).json({ message: "Failed to get books" });
    });
});

// Get book details based on ISBN
// public_users.get("/isbn/:isbn", function (req, res) {
//   //Write your code here
//   let isbn = req.params.isbn;
//   return res.send(books[isbn]);
// });
// Task11: async-await
// Get book details based on ISBN using Async-Await
public_users.get("/isbn/:isbn", async function (req, res) {
  try {
    const isbn = req.params.isbn;

    const getBookByIsbn = new Promise((resolve, reject) => {
      if (books[isbn]) {
        resolve(books[isbn]);
      } else {
        reject(new Error("Book not found"));
      }
    });

    const bookDetails = await getBookByIsbn;
    return res.status(200).json(bookDetails);
  } catch (error) {
    return res.status(404).json({ message: error.message });
  }
});

// Get book details based on author
// public_users.get("/author/:author", function (req, res) {
//   //Write your code here
//   let author = req.params.author;
//   let filtered_books = Object.values(books).filter(
//     (book) => book.author.toLowerCase() === author.toLowerCase(),
//   );

//   return res.send(JSON.stringify(filtered_books, null, 4));
// });
// Task12: async-await
// Get book details based on author using Async-Await
public_users.get("/author/:author", async function (req, res) {
  try {
    const author = req.params.author;
    const getBooksByAuthor = new Promise((resolve, reject) => {
      let filtered_books = Object.values(books).filter(
        (book) => book.author.toLowerCase() === author.toLowerCase(),
      );

      if (filtered_books.length > 0) {
        resolve(filtered_books);
      } else {
        reject(new Error("Author not found"));
      }
    });

    const booksByAuthor = await getBooksByAuthor;
    return res.status(200).json(booksByAuthor);
  } catch (error) {
    return res.status(404).json({ message: error.message });
  }
});

// Get all books based on title
public_users.get("/title/:title", function (req, res) {
  //Write your code here
  let title = req.params.title;
  let filtered_books = Object.values(books).filter((book) => {
    return book.title.toLowerCase() === title.toLowerCase();
  });
  return res.send(JSON.stringify(filtered_books, null, 4));
});
// Task13:
public_users.get("/title/:title", async function (req, res) {
  try {
    const title = req.params.title;

    const getBooksByTitle = new Promise((resolve, reject) => {
      let filtered_books = Object.values(books).filter((book) => {
        return book.title.toLowerCase() === title.toLowerCase();
      });

      if (filtered_books.length > 0) {
        resolve(filtered_books);
      } else {
        reject(new Error("Book with the specified title not found"));
      }
    });

    const booksByTitle = await getBooksByTitle;
    return res.status(200).json(booksByTitle);
  } catch (error) {
    return res.status(404).json({ message: error.message });
  }
});

//  Get book review
public_users.get("/review/:isbn", function (req, res) {
  //Write your code here
  const isbn = req.params.isbn;
  return res.send(JSON.stringify(books[isbn].reviews, null, 4));
});

module.exports.general = public_users;
