
export const formarStrValue = function (arr,pos) {
    return arr.split("*-*")[pos]
};
export const formatValuetoStr = function (key1,key2) {
    return key1+"*-*"+key2;
};
export const formatDate = function(date){
    if(typeof(date) == "string")
        date = new Date(date);
    return (date.getDay() + "/" +date.getMonth() + "/" +date.getFullYear())
}
