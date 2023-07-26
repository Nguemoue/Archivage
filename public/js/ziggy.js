/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	// The require scope
/******/ 	var __webpack_require__ = {};
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
/*!*******************************!*\
  !*** ./resources/js/ziggy.js ***!
  \*******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "Ziggy": () => (/* binding */ Ziggy)
/* harmony export */ });
var Ziggy = {
  "url": "http:\/\/localhost",
  "port": null,
  "defaults": {},
  "routes": {
    "elfinder.index": {
      "uri": "elfinder",
      "methods": ["GET", "HEAD"]
    },
    "elfinder.connector": {
      "uri": "elfinder\/connector",
      "methods": ["GET", "HEAD", "POST", "PUT", "PATCH", "DELETE", "OPTIONS"]
    },
    "elfinder.popup": {
      "uri": "elfinder\/popup\/{input_id}",
      "methods": ["GET", "HEAD"]
    },
    "elfinder.filepicker": {
      "uri": "elfinder\/filepicker\/{input_id}",
      "methods": ["GET", "HEAD"]
    },
    "elfinder.tinymce": {
      "uri": "elfinder\/tinymce",
      "methods": ["GET", "HEAD"]
    },
    "elfinder.tinymce4": {
      "uri": "elfinder\/tinymce4",
      "methods": ["GET", "HEAD"]
    },
    "elfinder.tinymce5": {
      "uri": "elfinder\/tinymce5",
      "methods": ["GET", "HEAD"]
    },
    "elfinder.ckeditor": {
      "uri": "elfinder\/ckeditor",
      "methods": ["GET", "HEAD"]
    },
    "livewire.message": {
      "uri": "livewire\/message\/{name}",
      "methods": ["POST"]
    },
    "livewire.upload-file": {
      "uri": "livewire\/upload-file",
      "methods": ["POST"]
    },
    "livewire.preview-file": {
      "uri": "livewire\/preview-file\/{filename}",
      "methods": ["GET", "HEAD"]
    },
    "api.soustype.fields": {
      "uri": "api\/sousType\/{id}\/fields",
      "methods": ["GET", "HEAD"]
    },
    "admin.home": {
      "uri": "\/",
      "methods": ["GET", "HEAD"],
      "domain": "admin.localhost"
    },
    "admin.login": {
      "uri": "login",
      "methods": ["POST"],
      "domain": "admin.localhost"
    },
    "admin.logout": {
      "uri": "logout",
      "methods": ["POST"],
      "domain": "admin.localhost"
    },
    "admin.password.request": {
      "uri": "forgot-password",
      "methods": ["GET", "HEAD"],
      "domain": "admin.localhost"
    },
    "admin.password.email": {
      "uri": "forgot-password",
      "methods": ["POST"],
      "domain": "admin.localhost"
    },
    "admin.password.reset": {
      "uri": "reset-password\/{token}",
      "methods": ["GET", "HEAD"],
      "domain": "admin.localhost"
    },
    "admin.password.update": {
      "uri": "reset-password",
      "methods": ["POST"],
      "domain": "admin.localhost"
    },
    "home": {
      "uri": "\/",
      "methods": ["GET", "HEAD"]
    },
    "sdda.index": {
      "uri": "sdda",
      "methods": ["GET", "HEAD"]
    },
    "fichiers.index": {
      "uri": "fichiers",
      "methods": ["GET", "HEAD"]
    },
    "fichiers.create": {
      "uri": "fichiers\/create",
      "methods": ["GET", "HEAD"]
    },
    "fichiers.store": {
      "uri": "fichiers",
      "methods": ["POST"]
    },
    "fichiers.show": {
      "uri": "fichiers\/{fichier}",
      "methods": ["GET", "HEAD"]
    },
    "fichiers.edit": {
      "uri": "fichiers\/{fichier}\/edit",
      "methods": ["GET", "HEAD"]
    },
    "fichiers.update": {
      "uri": "fichiers\/{fichier}",
      "methods": ["PUT", "PATCH"]
    },
    "fichiers.destroy": {
      "uri": "fichiers\/{fichier}",
      "methods": ["DELETE"]
    },
    "fichiers.decision.index": {
      "uri": "fichiers\/{fichier}\/decision",
      "methods": ["GET", "HEAD"]
    },
    "fichiers.decision.create": {
      "uri": "fichiers\/{fichier}\/decision\/create",
      "methods": ["GET", "HEAD"]
    },
    "fichiers.decision.store": {
      "uri": "fichiers\/{fichier}\/decision",
      "methods": ["POST"]
    },
    "fichiers.decision.show": {
      "uri": "fichiers\/{fichier}\/decision\/{decision}",
      "methods": ["GET", "HEAD"]
    },
    "fichiers.decision.edit": {
      "uri": "fichiers\/{fichier}\/decision\/{decision}\/edit",
      "methods": ["GET", "HEAD"]
    },
    "fichiers.decision.update": {
      "uri": "fichiers\/{fichier}\/decision\/{decision}",
      "methods": ["PUT", "PATCH"]
    },
    "fichiers.decision.destroy": {
      "uri": "fichiers\/{fichier}\/decision\/{decision}",
      "methods": ["DELETE"]
    },
    "previewFile.url": {
      "uri": "previewDocumentFile\/{url}",
      "methods": ["GET", "HEAD"]
    },
    "file.preview": {
      "uri": "preview-file\/{id}",
      "methods": ["GET", "HEAD"]
    },
    "dashboard": {
      "uri": "dashboard",
      "methods": ["GET", "HEAD"]
    },
    "register": {
      "uri": "register",
      "methods": ["GET", "HEAD"]
    },
    "login": {
      "uri": "login",
      "methods": ["GET", "HEAD"]
    },
    "password.request": {
      "uri": "forgot-password",
      "methods": ["GET", "HEAD"]
    },
    "password.email": {
      "uri": "forgot-password",
      "methods": ["POST"]
    },
    "password.reset": {
      "uri": "reset-password\/{token}",
      "methods": ["GET", "HEAD"]
    },
    "password.update": {
      "uri": "reset-password",
      "methods": ["POST"]
    },
    "verification.notice": {
      "uri": "verify-email",
      "methods": ["GET", "HEAD"]
    },
    "verification.verify": {
      "uri": "verify-email\/{id}\/{hash}",
      "methods": ["GET", "HEAD"]
    },
    "verification.send": {
      "uri": "email\/verification-notification",
      "methods": ["POST"]
    },
    "password.confirm": {
      "uri": "confirm-password",
      "methods": ["GET", "HEAD"]
    },
    "logout": {
      "uri": "logout",
      "methods": ["POST"]
    },
    "scan.index": {
      "uri": "scan",
      "methods": ["GET", "HEAD"]
    },
    "scann.document.create": {
      "uri": "scan\/document\/create",
      "methods": ["GET", "HEAD"]
    },
    "scann.document.store": {
      "uri": "scan\/document\/store",
      "methods": ["POST"]
    },
    "scann.dossier.create": {
      "uri": "scan\/dossier\/create",
      "methods": ["GET", "HEAD"]
    },
    "scann.dossier.store": {
      "uri": "scan\/dossier\/store",
      "methods": ["POST"]
    },
    "traitement.index": {
      "uri": "traitement",
      "methods": ["GET", "HEAD"]
    },
    "traitement.document.index": {
      "uri": "traitement\/document",
      "methods": ["GET", "HEAD"]
    },
    "traitement.document.show": {
      "uri": "traitement\/document\/{id}",
      "methods": ["GET", "HEAD"]
    },
    "traitement.dossier.index": {
      "uri": "traitement\/dossier",
      "methods": ["GET", "HEAD"]
    },
    "traitement.dossier.show": {
      "uri": "traitement\/dossier\/{id}",
      "methods": ["GET", "HEAD"],
      "wheres": {
        "id": "[0-9]+"
      }
    },
    "traitement.document.finish": {
      "uri": "traitement\/document\/{id}\/sucess",
      "methods": ["GET", "HEAD"]
    },
    "traitement.document.updateData": {
      "uri": "traitement\/document\/{id}\/updateData",
      "methods": ["POST"]
    },
    "traitement.dossier-traitement.finish": {
      "uri": "traitement\/document\/{id}\/finish",
      "methods": ["POST"]
    },
    "type.index": {
      "uri": "type",
      "methods": ["GET", "HEAD"]
    },
    "type.create": {
      "uri": "type\/create",
      "methods": ["GET", "HEAD"]
    },
    "type.store": {
      "uri": "type",
      "methods": ["POST"]
    },
    "type.show": {
      "uri": "type\/{type}",
      "methods": ["GET", "HEAD"]
    },
    "type.edit": {
      "uri": "type\/{type}\/edit",
      "methods": ["GET", "HEAD"],
      "bindings": {
        "type": "id"
      }
    },
    "type.update": {
      "uri": "type\/{type}",
      "methods": ["PUT", "PATCH"],
      "bindings": {
        "type": "id"
      }
    },
    "type.destroy": {
      "uri": "type\/{type}",
      "methods": ["DELETE"],
      "bindings": {
        "type": "id"
      }
    },
    "soustype.index": {
      "uri": "soustype",
      "methods": ["GET", "HEAD"]
    },
    "soustype.create": {
      "uri": "soustype\/create",
      "methods": ["GET", "HEAD"]
    },
    "soustype.store": {
      "uri": "soustype",
      "methods": ["POST"]
    },
    "soustype.show": {
      "uri": "soustype\/{soustype}",
      "methods": ["GET", "HEAD"]
    },
    "soustype.edit": {
      "uri": "soustype\/{soustype}\/edit",
      "methods": ["GET", "HEAD"],
      "bindings": {
        "soustype": "id"
      }
    },
    "soustype.update": {
      "uri": "soustype\/{soustype}",
      "methods": ["PUT", "PATCH"],
      "bindings": {
        "soustype": "id"
      }
    },
    "soustype.destroy": {
      "uri": "soustype\/{soustype}",
      "methods": ["DELETE"],
      "bindings": {
        "soustype": "id"
      }
    },
    "soustype.fields.index": {
      "uri": "soustype\/{soustype}\/fields",
      "methods": ["GET", "HEAD"],
      "bindings": {
        "soustype": "id"
      }
    },
    "soustype.fields.create": {
      "uri": "soustype\/{soustype}\/fields\/create",
      "methods": ["GET", "HEAD"],
      "bindings": {
        "soustype": "id"
      }
    },
    "soustype.fields.store": {
      "uri": "soustype\/{soustype}\/fields",
      "methods": ["POST"]
    },
    "soustype.fields.show": {
      "uri": "soustype\/{soustype}\/fields\/{field}",
      "methods": ["GET", "HEAD"]
    },
    "soustype.fields.edit": {
      "uri": "soustype\/{soustype}\/fields\/{field}\/edit",
      "methods": ["GET", "HEAD"],
      "bindings": {
        "soustype": "id",
        "field": "id"
      }
    },
    "soustype.fields.update": {
      "uri": "soustype\/{soustype}\/fields\/{field}",
      "methods": ["PUT", "PATCH"],
      "bindings": {
        "soustype": "id",
        "field": "id"
      }
    },
    "soustype.fields.destroy": {
      "uri": "soustype\/{soustype}\/fields\/{field}",
      "methods": ["DELETE"],
      "bindings": {
        "soustype": "id",
        "field": "id"
      }
    },
    "classement.index": {
      "uri": "classement",
      "methods": ["GET", "HEAD"]
    },
    "classement.create": {
      "uri": "classement\/create",
      "methods": ["GET", "HEAD"]
    },
    "classement.store": {
      "uri": "classement",
      "methods": ["POST"]
    },
    "classement.show": {
      "uri": "classement\/{classement}",
      "methods": ["GET", "HEAD"],
      "bindings": {
        "classement": "id"
      }
    },
    "classement.edit": {
      "uri": "classement\/{classement}\/edit",
      "methods": ["GET", "HEAD"],
      "bindings": {
        "classement": "id"
      }
    },
    "classement.update": {
      "uri": "classement\/{classement}",
      "methods": ["PUT", "PATCH"],
      "bindings": {
        "classement": "id"
      }
    },
    "classement.destroy": {
      "uri": "classement\/{classement}",
      "methods": ["DELETE"],
      "bindings": {
        "classement": "id"
      }
    },
    "classement.dossier.index": {
      "uri": "classement\/dossier",
      "methods": ["GET", "HEAD"]
    },
    "classement.dossier.post": {
      "uri": "classement\/dossier\/{dossierId}",
      "methods": ["GET", "HEAD"],
      "wheres": {
        "dossierId": "[0-9]+"
      }
    },
    "sousClassement.all": {
      "uri": "sousClassements\/all",
      "methods": ["GET", "HEAD"]
    },
    "classement.sousclassement.index": {
      "uri": "classement\/{classement}\/sousclassement",
      "methods": ["GET", "HEAD"]
    },
    "classement.sousclassement.create": {
      "uri": "classement\/{classement}\/sousclassement\/create",
      "methods": ["GET", "HEAD"]
    },
    "classement.sousclassement.store": {
      "uri": "classement\/{classement}\/sousclassement",
      "methods": ["POST"],
      "bindings": {
        "classement": "id"
      }
    },
    "classement.sousclassement.show": {
      "uri": "classement\/{classement}\/sousclassement\/{sousclassement}",
      "methods": ["GET", "HEAD"]
    },
    "classement.sousclassement.edit": {
      "uri": "classement\/{classement}\/sousclassement\/{sousclassement}\/edit",
      "methods": ["GET", "HEAD"],
      "bindings": {
        "classement": "id"
      }
    },
    "classement.sousclassement.update": {
      "uri": "classement\/{classement}\/sousclassement\/{sousclassement}",
      "methods": ["PUT", "PATCH"]
    },
    "classement.sousclassement.destroy": {
      "uri": "classement\/{classement}\/sousclassement\/{sousclassement}",
      "methods": ["DELETE"]
    },
    "navigation.index": {
      "uri": "navigate\/index",
      "methods": ["GET", "HEAD"]
    },
    "statistique.index": {
      "uri": "statistique\/index",
      "methods": ["GET", "HEAD"]
    },
    "statistique.home": {
      "uri": "statistique\/home",
      "methods": ["POST"]
    },
    "statistique.filePdf": {
      "uri": "statistique\/{sousType}\/pdfDownload",
      "methods": ["POST"]
    },
    "statistique.file": {
      "uri": "statistique\/{sousType}\/pdfFile",
      "methods": ["GET", "HEAD"]
    }
  }
};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
  Object.assign(Ziggy.routes, window.Ziggy.routes);
}


/******/ })()
;