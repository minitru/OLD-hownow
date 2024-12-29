amline version 1.5.2.0
********************************************************************************
Check documentation for help on all topics:
http://www.amcharts.com/docs/

Incase you don't find something, post your questions to support forum:
http://www.amcharts.com/forum/

********************************************************************************
1.5.2.0

New features:

JavaScript function amError(chart_id, error_message) is called when one of the
known errors occures.

New JavaScript function for showing/hiding and selecting/deselecting graphs 
added:

flashMovie.showGraph(index)
flashMovie.hideGraph(index)
flashMovie.selectGraph(index)
flashMovie.deselectGraph(index)

You can also use these functions in case you load chart to another swf movie.

********************************************************************************
1.5.1.0

New feature: the area between every second y axis grid can be filled with
color. The color is defined at: <grid><y_left><fill_color>. Fill alpha can be
defined at <grid><y_left><fill_alpha>

Bug fix: When reloading settings with reloadSettings() function, if settings
file contained data, the data wasn't refreshed. This is fixed in this version.
********************************************************************************