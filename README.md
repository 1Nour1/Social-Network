# Social-Network
A social networking web based application that involves the use of the internet to connect users with their friends, family 
and acquaintances. Social media websites are not necessarily about meeting new people online, although this does happen.
Instead, they are primarily about connecting with friends, family and acquaintances you already have in real life. 
The most well-known social media sites are Facebook, Twitter and Google+.
You can share photos, information and news through social networking web sites.

***Signup/ login /logout/ profile edit***
Each user profile must have the following fields:
● First name *
● Last name *
● Nickname
● Password *
● Phone Number(s)
● Email *
● Gender *
● Birthdate *
● Profile picture: there is a default photo for each gender.
● Hometown
● Marital status: Single, Engaged or Married.
● About me
Notes:
a. Any user should have a default profile picture depends on his/her gender.
b. Password must be encrypted in DB.
c. Login should be done with email and password.
d. Nickname should be used as the display name of a user. If the user leaves it blank in registration, it should be set 
by first name and last name.
e. All profile info should be public except Birthdate and About me.
f. Public means  all users can see. Private means  friends only.
g. “*” denotes required fields in registration form.

***Browsing Friends and Send or Accept Friend requests:***
User should be able to add someone to his/her friend list. By sending friendship request to a buddy, this buddy should view
the friendship requests that he/she has got in a place with the number of friend requests.
Notes:
a. It's not required to have real time notification.
b. The friend requests number should be viewed in all screens. With a link to page having list of friend requests to accept/ reject them.
c. Each user has a button “Friends” that will navigate to friends’ page and will list all friends for logged in user. 
Friends’ names will be hyperlinked so clicking on any friend’s name will navigate to his profile.

***Posting data:***
Users can make posts that should be shown in their profile:-
Each post has the following fields:-
● Caption *
● Image
● Posted time *
● Is public *
● Poster name *
Notes:
a. When a user changes his profile picture, a new private post should be added with caption “User has changed his/her profile picture”.
b. Public means that all users can see the post. Private means for friends only.

***Home and Profile screen***
User should view posts (recent posts first) in his home screen form:
a. Public posts by all users.
b. Private posts by friends.
Notes:
a. When you browse someone’s profile you should see Data depending on your relationship with him or her.
b. Posts are displayed in chronological order from latest to oldest.

***Advanced Search***
Users can search through a screen in the following fields:
a. Full email
b. First ,last names
c. Hometown
d. Part of caption from all posts he has posted before
