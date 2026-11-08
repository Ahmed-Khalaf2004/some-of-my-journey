import React, { useState } from 'react';
import './FeedbackForm.css'; // Import CSS for styling

const FeedbackForm = () => {
  const [data, setData] = useState({
    name: '',
    email: '',
    feedback: ''
  });

  const handleChange = (e) => {
    const { name, value } = e.target;
    setData({
      ...data,
      [name]: value
    })
  }

  const handleSubmit = (e) => {
    e.preventDefault();
    const confMessage = window.confirm("your feedback will be submitted. \n {name: " + data.name + ", \n email: " + data.email + ", \n feedback: " + data.feedback + "}");
    if (confMessage) {
      console.log("Feedback submitted:", data);
      // Reset the form after submission
      setData({
        name: '',
        email: '',
        feedback: ''
      });
      alert("Thank you for your feedback!");

    }

  };

  return (
    <>
    <nav>
    Tell Us What You Think
    </nav>
      <form className="feedback-form">
        <h2>We'd Love to Hear From You!</h2>
        <p>Please share your feedback with us.</p>
        <input type="text" placeholder="Your Name" name="name" value={data.name} onChange={handleChange} />
        <input type="email" placeholder="Your Email" name="email" value={data.email} onChange={handleChange} />
        <textarea placeholder="Your Feedback" name="feedback" value={data.feedback} onChange={handleChange}></textarea>
        <button type="submit" onClick={handleSubmit}>Submit Feedback</button>
      </form>
    </>
  );
};

export default FeedbackForm;
