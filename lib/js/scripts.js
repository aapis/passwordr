function toClipboard(text) {
  
  if (window.clipboardData) {
  	window.clipboardData.setData("Text",text);
  }
  
}