from collections import OrderedDict

# Manage core logic by this class
class Settlement :
    @staticmethod
    def default_key(d):
        result = 0
        for key, _ in d.items():
           	# Check key is integer and key is not less than result
            if(type(key) is int and key >= result) :
                # Get new key
                result = key + 1
        d[result] = OrderedDict()
        return result
    
#---------------------------------
# kalkicode.com 
# These methods have not been changed by our tools.
# curl_init
# curl_setopt
# curl_exec
# json_decode
# json_encode
#----------------------------

headers = OrderedDict([(0,"User-Agent: Rest data"),(1,"Authorization: 8mXtMA8yZcZGRNY2feEpy4CV2lwmFJ7WN-w_EOqdcEQ")]);

ch = curl_init("https://track.onestepgps.com/v3/api/public/device-info?state_detail=1&lat_lng&api-key=8mXtMA8yZcZGRNY2feEpy4CV2lwmFJ7WN-w_EOqdcEQ");

curl_setopt(ch, CURLOPT_HTTPHEADER, headers);

curl_setopt(ch, CURLOPT_RETURNTRANSFER, True);

response = curl_exec(ch);

data = json_decode(response, True);
features = OrderedDict([]);
for key,value in data.items() :
    k__1 = Settlement.default_key(features)
    features[k__1] = OrderedDict([("type","Feature"),("properties",OrderedDict([("Factory_ID",value['factory_id']),("make",value['make']),("model",value['model']),("active_state",value['active_state']),("heading",value['heading']),("dt_tracker",value['dt_tracker']),("drive_status",value['drive_status'])])),("geometry",OrderedDict([("type","MultiPoint"),("coordinates",OrderedDict([(0,OrderedDict([(0,value['lng']),(1,value['lat'])]))]))]))]);


new_data = OrderedDict([('type','FeatureCollection'),('name','tracking'),('crs',OrderedDict([('type','name'),('properties',OrderedDict([('name',"EPSG:4326")]))])),('features',features)]);
final_data = json_encode(new_data, 128);
print(final_data);