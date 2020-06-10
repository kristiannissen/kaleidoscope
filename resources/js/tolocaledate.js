const timeElm = document.querySelector('time');
const d = new Date(Date.parse(timeElm.innerText));
timeElm.innerText = d.toLocaleString(navigator.language || 'en-US', {
  day: 'numeric',
  month: 'short',
  year: 'numeric'
});