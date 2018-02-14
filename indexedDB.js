var cek = 1;

var idbApp = (function() {
  'use strict';

  var dbPromise = idb.open('assets', 1, function(upgradeDb) {
    switch (upgradeDb.oldVersion) {
      case 0:
        console.log('Creating the object stores');
        upgradeDb.createObjectStore('calendar', {keyPath: 'id'});
        upgradeDb.createObjectStore('tipe', {keyPath: 'id'});

        var events = upgradeDb.transaction.objectStore('calendar');
        events.createIndex('id', 'id', {unique: true});
        events.createIndex('id_tipe', 'id_tipe');

        var types = upgradeDb.transaction.objectStore('tipe');
        types.createIndex('id', 'id', {unique: true});
    }
  });

  function clearDataCalendar() {
      dbPromise.then(function(db) {
      var tx = db.transaction('calendar', 'readwrite');
      var store = tx.objectStore('calendar');
      
      store.clear();
    });
  }

  function clearDataType() {
      dbPromise.then(function(db) {
      var tx = db.transaction('tipe', 'readwrite');
      var store = tx.objectStore('tipe');
      
      store.clear();
    });
  }

  function addEvents(items) {
    dbPromise.then(function(db) {
    var tx = db.transaction('calendar', 'readwrite');
    var store = tx.objectStore('calendar');
    
    return Promise.all(items.map(function(item) {
        console.log('Adding item: ', item);
        return store.add(item);
      })
    ).catch(function(e) {
      tx.abort();
      console.log(e);
    }).then(function() {
      console.log('All items added successfully!');
    });
  });
  }

  function addTypes(items) {
    dbPromise.then(function(db) {
    var tx = db.transaction('tipe', 'readwrite');
    var store = tx.objectStore('tipe');
    
    return Promise.all(items.map(function(item) {
        console.log('Adding item: ', item);
        return store.add(item);
      })
    ).catch(function(e) {
      tx.abort();
      console.log(e);
    }).then(function() {
      console.log('All items added successfully!');
    });
  });
  }

  function getByIdTipe(key) {
      return dbPromise.then(function(db) {
      var tx = db.transaction('calendar', 'readonly');
      var store = tx.objectStore('calendar');
      var index = store.index('id_tipe');
      return index.get(key);
    });
  }

  function getTipeInternal() {
    var s = '';
    var select = document.getElementById('display');
    dbPromise.then(function(db) {
      var tx = db.transaction('tipe', 'readonly');
      var store = tx.objectStore('tipe');
      return store.openCursor();
    }).then(function showRange(cursor) {
      if (!cursor) {return;}
      console.log('Cursored at:', cursor.value.nama_tipe);
      var opt = document.createElement('option');
      opt.value = cursor.value.id;
      opt.innerHTML = cursor.value.nama_tipe;
      select.appendChild(opt);
      // s += '<option value='+cursor.value.id +">"+cursor.value.nama_tipe+"</option>";

      return cursor.continue().then(showRange);
    }).then(function() {
      // if (s === '') {s = '<option>No results.</option>';}
        console.log('done');
      // document.getElementById('opts').innerHTML = s;
    });
  }

  function getTypes()
  {
    dbPromise.then(function(db) {
      var tx = db.transaction('tipe', 'readonly');
      var store = tx.objectStore('tipe');
      return store.getAll();
    });
  }

  function countTypes()
  {
    // var s = [];
    var defer = $.Deferred();
    var x = 0;
    return dbPromise.then(function(db) {
      var tx = db.transaction('tipe', 'readonly');
      var store = tx.objectStore('tipe');
      return store.openCursor();
    }).then(function showRange(cursor) {
      if (!cursor) {return;}
      console.log('Cursored at:', cursor.value.nama_tipe);
      x++;
      jmlh += 1;
      return cursor.continue().then(showRange);
     }).then(function() {
      // if (s === '') {s = '<option>No results.</option>';}
        console.log('done : ' + x);
        defer.resolve(x);
        return defer.promise();
        var hasil = "<p>"+ x + "</p>";
      document.getElementById('jmlhtipe').innerHTML = hasil;
      // return x;
      
    });
  }
  function toJSON(cursor)
  {
        if (!cursor) {
          globalVar+="]"; 
          return;
        }

        var now = 1;
        if(cek==1)
        {
          globalVar += '{';
        }else
        {
          globalVar += ',{';
        }

        for (var field in cursor.value) {
          if(now>1)
          {
            globalVar += ',';
          }

          globalVar += '"' + field + '":';

          if(field == 'id' || field == 'id_tipe' || field == 'idUser')
          {
            globalVar += cursor.value[field];  
          }else
          {
            globalVar += '"' + cursor.value[field] + '"';
          }
          
          now++;
        }
        globalVar += '}';
        cek++;
        return cursor.continue().then(toJSON);
  }

  function getEvents()
  {
      globalVar = "[";
      
      cek = 1;
      return dbPromise.then(function(db) {
        var tx = db.transaction('calendar', 'readonly');
        var store = tx.objectStore('calendar');
        return store.openCursor();
      });
  }

  function fullEvents() {
    return getEvents().then(function(cursor) {
      return toJSON(cursor);
    }).then(function() {
      return globalVar;
    });
  }

  function amountType()
  {
    return countTypes().then(function(amount){
      return amount;
    });
  }

  return {
    dbPromise: (dbPromise),
    addTypes: (addTypes),
    addEvents: (addEvents),
    getByIdTipe: (getByIdTipe),
    clearDataType: (clearDataType),
    clearDataCalendar: (clearDataCalendar),
    getTypes: (getTypes),
    getTipeInternal: (getTipeInternal),
    getEvents: (getEvents),
    fullEvents: (fullEvents),
    countTypes: (countTypes),
    amountType: (amountType)
  };
})();