function createQuestion()
{
    var doc= document.querySelector('link[rel="import"]').import;    
    if (reg='0')
    {

        var quest = doc.querySelector("#main");
        var questField = document.getElementsByClassName('crt_test__quest')[0];
        questField.appendChild(quest.cloneNode(true));

    // var div = document.createElement('div');   
    // div.importNode(doc, true);
    // questField.appendChild()

    }

}
   
function removeElement(id) 
{
    var element = document.getElementById(elementId);
    element.parentNode.removeChild(element);
}
