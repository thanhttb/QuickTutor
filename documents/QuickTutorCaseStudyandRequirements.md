Quick tutor Case Study

**1**. Online math learning system

A simple, trustworthy website for students to find tutor according to their preferences and abilities. Tutor creates their own username where they could provide specified information about the class that they tend to teach.

**2**. System requirements specification

2.1. Functional requirements

2.1.1. Tutor side

\* *Create new account*

- Allow tutor to create accounts.

> - Each account is identified by a unique username.
>
> - If the username already exists, announce the user.
>
> - If the password and confirm password don’t match, announce the user.
>
> - After successful registrations, log the user in.
>
> *\* Login*
>
> - A user uses his username and password to login
>
> - Check if (username, password) is a valid pair or not, if not, make an announcement
> to the user.
>
> - If user forgot their password, provide their new password through email.
>
> \* *Create and Edit profile*
>
> - A user can only create, edit his/her profile.
>
> - User must provide all the necessary information, subjects and their spare time.
>
> - If user wants to change his or her password, a confirm password that matches the
> new password must be provided.
>
> 2.1.2 Student and Parent side
>
> \* *Find tutor*
>
> - Client find tutor according to their preferences by multiple filters (subject, class, time, location, etc.) without creating a new account.
>
> - Client can observe tutor’s profile without permission to edit it.

2.2. Non-functional requirements

> - To provide a quick and simple response to client, a tutor-ranking based on the number of clients that tutor has taken, the information provided and the update frequency must be calculated in the backend.

**3**. System testing

- Test by inspection.
