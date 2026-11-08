let promise1 = new Promise((resolved, rejected) => {
  setTimeout(() => {
    resolved("this is promise1");
  }, 6000);
});

let promise2 = new Promise((resolved, rejected) => {
  setTimeout(() => {
    resolved("this is promise2");
  }, 3000);
});

promise2
  .then((successMessage) => {
    console.log("from promise1 callback " + successMessage);
    //   return promise2();          
  })
  .then(
    promise1.then((successMessage) => {
      console.log("from promise2 callback " + successMessage);
    }),
  );
