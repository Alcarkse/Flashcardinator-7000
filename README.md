# Flashcardinator-7000

	== == == == == == ==
	*** Improvements ***
	== == == == == == ==

- mobile Friendly UI:
	. Scaling
	. Swiping To next word

- [DONE] performance optimization:
	. [DONE] compute array of vocabulary on server
	. [DONE] use ajax calls to download each set of (char, pinyin, eng)


Server-Client Interaction:
--------------------------

CASE 1:

0) Client requests specific vocabulary

1) PHP gets the vocabulary from the csv file in google sheets
1.1) PHP normalized the 2D array (labels and cleanup)

2) PHP filters the array according to the specification sent by client
2.2) PHP sends the filtered array to client as JSON file

3) Client shuffles the array and handles displaying / changing the display of centent the content to user.
==> Array only shuffled once

----
CASE 2:

User changes filtering specifications (enable/disable category)

1) Client sends AJAX request with filtering specifications
2) PHP responds to the request in the same way as CASE 1
3) Client updates the information displayed

C'est null c'est tout en chinois