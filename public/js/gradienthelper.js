const initializeCanvasAnimation = () => {
  const canvas = document.getElementById("gradient");
  if (canvas === null) {
    return
  }
  var ctx = canvas.getContext('2d');

  const col = (x, y, r, g, b) => {
    ctx.fillStyle = `rgb(${r},${g},${b})`;
    ctx.fillRect(x, y, 1, 1);
  };
  const R = (x, y, t) => Math.floor(192 + 64 * Math.cos((x * x - y * y) / 300 + t));

  const G = (x, y, t) => Math.floor(192 + 64 * Math.sin((x * x * Math.cos(t / 4) + y * y * Math.sin(t / 3)) / 300));

  const B = (x, y, t) => Math.floor(192 + 64 * Math.sin(5 * Math.sin(t / 9) + ((x - 100) * (x - 100) + (y - 100) * (y - 100)) / 1100));

  let t = 0;

  const run = () => {
    for (x = 0; x <= 35; x++) {
      for (y = 0; y <= 35; y++) {
        col(x, y, R(x, y, t) / 1.4, 0, B(x, y, t));
      }
    }
    t = t + 0.010;
    window.requestAnimationFrame(run);
  };

  run();
}