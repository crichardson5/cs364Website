function transactionSwitch() {
  // Get the checkbox
  var checkBox = document.getElementById("transSwitch");
  // Get the output text
  var text = document.getElementById("submitTransaction");

  // If the checkbox is checked, display the output text
  if (checkBox.checked == true){
    text.value = "Submit Income";
  } else {
    text.value = "Submit Expense";
  }
}
