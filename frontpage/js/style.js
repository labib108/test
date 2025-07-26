function setProgress(barId, value) {
      const bar = document.getElementById(barId);
      bar.style.width = value + '%';
      bar.innerText = value + '%';
    }

    // Set default values
    setProgress('bar1', 70);
    setProgress('bar2', 90);
    setProgress('bar3', 80);