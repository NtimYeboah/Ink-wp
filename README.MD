# Ink
## _Theme crafted to showcase your writing!_

### View it you'll love it!


Captivate your readers with Ink, Wordpress theme crafted to showcase your writing. Whether you're a seasoned author or just starting out, Ink's unique homepage layouts provide the perfect platform to share your stories. This responsive theme seamlessly adapts to any device, ensuring your words reach readers on mobile, tablets, and desktops. And for added comfort, Ink offers both light and dark mode options, making reading a pleasure at any time of day. Let Ink help your writing shine!

- Pixel perfect modern design crafted to make your writing stand out.
- Unique homepage layouts to make it yours.
- Responsive and adaptive to various screens sizes.
- Light and dark mode options.

## Setup
Ink needs a least 3 pages to work. There pages are Articles, Projects and About pages.
Articles will display a list of all your articles, project page will display projects you have undertaken and about page display information about the blog owner.

### Pages
We will create three (3) pages which are Article, Projects and About. Let's head over to Pages in the Admin to create these pages.

**Creating Pages**
- Hover Pages and click "Add New Page".
- For the title of the page type "Articles" and publish.
- Repeat these steps for Project and use "Projects" as title and publish.
- Repeat these steps for About and use "About" as title and publish.
You are set for the pages you need to make the theme work.

### Menus
Ink comes with two (2) menus for our site. A primary menu that would be displayed on the navigation bar and a footer menu that would be displayed on the footer.
To create menu head over to the Admin dashboard, Appearance > Menus.

**Creating Primary Menu**
- Under Menu structure section, type “Main Menu” for the Menu Name section.
- Check Primary Menu under Menu Settings and click Create Menu button.
- Under Most Recent tab in Add menu items section, check Projects, About and Articles.
- Click Add to Menu button then click Save Menu in Menu structure section.

**Creating Footer Menu**
- Let’s create the second menu by clicking on "create a new menu" link.
- Give it a name of "Footer Menu", select Footer Menu under Menu Setting and click Create Menu.
- Under Most Recent tab in Add menu items section check Projects, About and Articles.
- Click Add to Menu button then click Save Menu in Menu structure section.


### Posts
Posts are the heart of our website. For the basic, we are goint to create four (4) posts to get us going.
Posts must be given a tag of **“article”** or **“tip”**.
Posts having the tag of **articles** will be displayed in the Latest Articles section of the homepage.
Likewise posts having a tag of **tip** will be displayed in the Tips & Snippets section of the homepage. Let’s create 4 posts, 2 for article tag and 2 for tip tag.

**Creating Posts**
To create posts head over to the Admin dashboard, Posts > Add New Post.

Create article having "article" tag.
- Give the post a title and write out the contents of the post.
- Most importantly assign a tag of **article** for the post.
- Assign a category for the post.
- You can optionally upload a featured image for the post.
- Publish the post.

Create article having "tip" tag.
- Give the post a title and write out the contents of the post.
- Most importantly assign a tag of **tip** for the post.
- Assign a category for the post.
- You can optionally upload a featured image for the post.
- Publish the post.

**At this point you can view all the articles you have created and visit all the menu items we setup earlier.**

### Sidebar
There are three (3) sidebars included in Ink. These are;
1. Main sidebar that will display widgets on the homepage.
2. The Related articles sidebar that will display related articles widget on the articles details page.
3. The Footer sidebar that will display any widget assign to the footer.

### Widgets
Sidebars need widgets that they can display.
Ink include four (4) widgets that can be added to the Main Sidebar.
These are;
1. Ink Search Widget
2. Ink Recent Articles Widget
3. Ink Tags Widget and
4. Ink Categories Widget

A single widget that can be added to the Related article sidebar. This is;
1. Ink Related Articles Widget

Head over the Admin dashboard, Appearance > Widgets.

**Adding Widgets to Main Sidebar**
- Click on the + container in Main Sidebar and type “ink” in the search box.
- Select Ink Search Widget. The title and placeholder text are optional.
- Repeat these steps until you add Ink Recent Articles Widget, Ink Tags Widget and Ink Categories Widget.
- Publish the sidebar.

**Adding Widgets to the Related article Sidebar**
- Click on the + container in Related article Sidebar and type “ink” in the search box.
- Select Ink Related Articles Widget. The title is optional.
- Publish the sidebar.

### Customizations
You can customize Ink to make it yours. Ink comes with customisation that can take you from Minimalist to Elaborate. The customization can be done to the Homepage, Article details page and the About page.

**Homepage**
The Homepage can be customized to fit your needs. You can go as Minimal as displaying only Latest Articles and Elaborate as displaying Featured Articles, Latest Articles, Tips and Snippets, and the Main Side which displays all the widgets.

To customize the Homepage, go to the Admin dasbhaord, Appearance > Customize > Homepage Settings.

Under this customization, you can optionally display the Featured Article container, Tips and Snippets container, and the Main Sidebar.

In order to display the Featured Article, you need to add a “**featured**” tag to any post you wish to set as the featured article.

You can optionally display any of these containers to come up with your unique Homepage appearance.
[Show a gif of customizing the Homepage]

**Detail Article Page**
The article details page displays an article’s content including the featured image, content, comment form and comments.

To customize the Article Details Page, go to the Admin dasbhaord, Appearance > Customize > Article Details Page Settings.

Under this customization, you can choose wordpress commenting system or Giscus under "Choose commenting system" option. [Giscus](https://giscus.app/) is a commenting system powered by Github Discussions.

**Using Giscus commenting system**
When you opt in for Giscus, you need to provide Giscus script to make Giscus work on the article details page. You have to paste Giscus script into the "Add Giscus script" textarea. The script should be similar to this
```sh
<script src="https://giscus.app/client.js"
    data-repo="[ENTER REPO HERE]"
    data-repo-id="[ENTER REPO ID HERE]"
    data-category="[ENTER CATEGORY NAME HERE]"
    data-category-id="[ENTER CATEGORY ID HERE]"
    data-mapping="pathname"
    data-strict="0"
    data-reactions-enabled="1"
    data-emit-metadata="0"
    data-input-position="bottom"
    data-theme="preferred_color_scheme"
    data-lang="en"
    crossorigin="anonymous"
    async>
</script>
```
Click Publish when done. You should see Github's comment form under your article.

**About Page**
The About Page gives information about the owner of this website. These information include a brief summary about you, your picture, contact information, Education and certifications and work experience. 

To customize the Homepage, go to the Admin dasbhaord, Appearance > Customize > About Page Settings.

The About Page Settings gives you the option to display the contact information, eduction and certification, and work experience.
[Show gif of about page customization]
