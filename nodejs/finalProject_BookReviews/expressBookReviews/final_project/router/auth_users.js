const express = require("express");
const jwt = require("jsonwebtoken");
let books = require("./booksdb.js");
// const { use } = require("react");
const regd_users = express.Router();

let users = [];

const isValid = (username) => {
  //returns boolean
  //write code to check is the username is valid
  let userswithsamename = users.filter((user) => {
    return user.username === username;
  });
  if (userswithsamename.length > 0) {
    return true;
  } else {
    return false;
  }
};

const authenticatedUser = (username, password) => {
  //returns boolean
  let validusers = users.filter((user) => {
    return user.username === username && user.password === password;
  });
  if (validusers.length > 0) {
    return true;
  } else {
    return false;
  }
};

//only registered users can login
regd_users.post("/login", (req, res) => {
  const username = req.body.username;
  const password = req.body.password;

  if (!username || !password) {
    return res.status(400).json({
      message: "Error logging in: Username and password are required",
    });
  }

  // الاستعانة بدالة authenticatedUser للتحقق
  if (authenticatedUser(username, password)) {
    let accessToken = jwt.sign(
      {
        data: password,
      },
      "access",
      { expiresIn: 60 * 60 },
    );

    req.session.authorization = {
      accessToken,
      username,
    };
    return res.status(200).json({ message: "User successfully logged in" });
  } else {
    return res
      .status(208)
      .json({ message: "Invalid Login. Check username and password" });
  }
});

// Add a book review
// Add a book review
regd_users.put("/auth/review/:isbn", (req, res) => {
  const isbn = req.params.isbn;
  const review = req.query.review; // قراءة المراجعة من الـ Query Parameters
  const username = req.session.authorization.username; // جلب اسم المستخدم من الجلسة
  if (!review) {
    return res.status(400).json({ message: "Review text is required" });
  }
  if (books[isbn]) {
    let book = books[isbn];
    book.reviews[username] = review;
    return res.status(200).json({
      message: `Review for the book with ISBN ${isbn} successfully added/updated.`,
      reviews: book.reviews,
    });
  } else {
    return res
      .status(404)
      .json({ message: `Book with ISBN ${isbn} not found` });
  }
});
// Delete a book review
regd_users.delete("/auth/review/:isbn", (req, res) => {
  const isbn = req.params.isbn;
  const username = req.session.authorization.username; // جلب اسم المستخدم من الجلسة

  // التأكد من أن الكتاب موجود
  if (books[isbn]) {
    let book = books[isbn];

    // التأكد من أن المستخدم لديه مراجعة مسجلة لهذا الكتاب بالفعل
    if (book.reviews && book.reviews[username]) {
      // حذف مراجعة هذا المستخدم فقط
      delete book.reviews[username];

      return res.status(200).json({
        message: `Review for the book with ISBN ${isbn} posted by user ${username} successfully deleted.`,
        reviews: book.reviews,
      });
    } else {
      return res
        .status(404)
        .json({
          message: `Review by user ${username} for this book not found.`,
        });
    }
  } else {
    return res
      .status(404)
      .json({ message: `Book with ISBN ${isbn} not found` });
  }
});

module.exports.authenticated = regd_users;
module.exports.isValid = isValid;
module.exports.users = users;
