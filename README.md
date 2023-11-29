
# Graph Widget

This is the simple WordPress plugin that adds a graph widget in admin dashboard. This plugin is created with React JS and REST API.

## Steps to install

Follow the below steps.

- Download the zip file from the GitHub and extract it into your `plugins` folder in WordPress.
- Activate the plugin.
- Go to https://github.com/krupal-panchal/graph-widget/blob/master/classes/class-graph-data-api.php#L53 file from your folder and just uncomment it. Then just refresh in your admin or go to Dashboard. (This simply adds a `graph_data` in `wp_options`. After that comment it again).
- Go to your `/plugins/graph-widget` and run command `npm install` to install required packages.
- Go to https://github.com/krupal-panchal/graph-widget/blob/master/src/components/GraphUI.jsx#L16 file and update your WordPress local URL.
- If you want to add any changes then go to `/graph-widget` and run command `npm start`. And update your code.
- Now you will see the `Graph Widget` available in dashboard.
