var part = 2;
var points = [];

while (num = readline()) {
  points.push(parseInt(num));
}

var curridx = 0;
var lastidx = 0;
var steps = 0;
while ((curridx >= 0) && (curridx < points.length)) {
  lastidx = curridx;
  curridx += points[curridx];
  steps++;
  if (part == 1) {
    points[lastidx]++;
  } else {
    if (points[lastidx] >= 3) {
      points[lastidx]--;
    } else {
      points[lastidx]++;
    }
  }
}

print("Part ",part," = ", steps);
