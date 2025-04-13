# Personal Sidequest
Sidequest I have been working on with the goal of creating a website where users can post short messages, similar to something like Twitter.
Made using Laravel.
Still very much a WIP.

## Current Functions
- Posts page, with an overview of all the existing posts, with their corresponding content, user's first name, title and date last updated.
  You can click on any of the posts to navigate to the individual posts page.

- Individual posts page, which gives the above information again, as well as the user, together with comments and tags, if relevant.
  This page also allows you to edit the selected post or delete it. It also allows you to comment on the post.
  Editing the post also updates the shown time.

- Login and registration system, which allows users to create an account and login with said account.
  They can also start creating posts once logged in, as well as only being able to edit and delete their own posts when logged in.


#### Useful commands
`php artisan serve` to start a local host
`php artisan migrate:fresh --seed` to reset the database, run clean migrations and rerun the seed, filling the database with fake data using factories.
`php artisan db:seed` run the seed, filling the database using factories. Is only a single seed right now, so no class required.
The current seed is set up to create several users, posts, comments and tags, all except the tags, linked to each other.


#### Planned Features
- Improve styling/interface
- Fix tag system, allow users to create tags and assign existing tags to their posts
- Adjusted homepage, based on chosen tags by user
