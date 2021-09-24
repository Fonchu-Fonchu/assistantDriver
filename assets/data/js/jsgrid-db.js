(function() {

    const db = {

        loadData: function (filter) {
            return $.grep(this.clients, function (client) {
                return (!filter.Matricule || client.Matricule.indexOf(filter.Matricule) > -1)
                    && (filter.Anomalie === undefined || client.Anomalie === filter.Anomalie)
                    && (!filter.Vitesse || client.Vitesse.indexOf(filter.Vitesse) > -1)
                    && (!filter.date || client.date === filter.date)
            });
        },

        insertItem: function (insertingClient) {
            this.clients.push(insertingClient);
        },

        updateItem: function (updatingClient) {
        },

        deleteItem: function (deletingClient) {
            const clientIndex = $.inArray(deletingClient, this.clients);
            this.clients.splice(clientIndex, 1);
        }

    };

    window.db = db;

let res = []
    const xhr = new XMLHttpRequest()
    xhr.open("GET", "http://localhost:5000/assistancedriver")
    xhr.onreadystatechange = () =>{
        if (xhr.readyState === 4){
            if (xhr.status === 200){
                const response = JSON.parse(xhr.responseText)
                response.forEach(item =>{
                    console.log(item)
                    res.push(item)
                })
            }
        }
    }
    xhr.send()
    console.log(res)
    db.clients = res;

}());
