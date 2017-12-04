func isAnagram(firstString: String, secondString: String) -> Bool {
	return firstString.lowercased().characters.sorted() == secondString.lowercased().characters.sorted()
}

var part1validcount = 0
var part2validcount = 0
while let line = readLine() {
	var part1valid = true
	var part2valid = true
	let words = line.characters.split{$0 == " "}.map(String.init)
	for (checkindex, checkword) in words.enumerated() {
		for (compareindex, compareword) in words.enumerated() {
			if checkindex != compareindex {
				if checkword == compareword {
					part1valid = false
					part2valid = false
					break
				}
				if isAnagram(firstString: checkword, secondString: compareword) {
					part2valid = false
					break
				}
			}
		}
	}
	if part1valid {
		part1validcount += 1
	}
	if part2valid {
		part2validcount += 1
	}
}
print("Part 1 =",part1validcount)
print("Part 2 =",part2validcount)
