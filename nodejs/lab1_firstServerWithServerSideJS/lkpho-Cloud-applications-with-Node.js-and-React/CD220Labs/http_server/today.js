// Export a function named 'getDate' from the module
module.exports.getDate = function getDate() {
  // Get the current date and time in the timezone "Asia/Gaza"
  let aestTime = new Date().toLocaleString("en-US", { timeZone: "Asia/Gaza" });
  let aestDate = new Date(aestTime);
  return aestDate;
};
