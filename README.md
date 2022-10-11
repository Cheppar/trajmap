# trajmap
Add custom shapes and styling on a map.
This is a simple Project for TRaj. The goal is to add custom shape icons on a map.

## Methodology

To draw an image on a map, I used leafletJS draw plugin, precisely the marker feature.
Then extend the draw properties 

` var customMarker= L.Icon.extend({
                    options: {
                        shadowUrl: null,
                        iconAnchor: new L.Point(12, 12),
                        iconSize: new L.Point(24, 24),
                        iconUrl: 'img/aoi-cylinder.png'
                    }
                });`
                
Declare the draw control
`var ctlDraw = new L.Control.Draw({
                    draw:{
                        circle:false,
                        rectangle:false,
                        polyline : false,
                        marker : {
                            icon: new customMarker()
                        },
                    },
                    edit:{
                        featureGroup:fgpDrawnItems
                    }
                });
                ctlDraw.addTo(mymap);
`
Add the Draw functionality to map.

` ctlDraw.addTo(mymap);`
