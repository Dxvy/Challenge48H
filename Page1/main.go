package main

import (
	"fmt"
	"html/template"
	"net/http"
)

type reponse struct {
	Verif bool
	Ip    string
}

func main() {
	t := new(reponse)
	t.Verif = false
	t.Ip = ""
	tmpl_index := template.Must(template.ParseFiles("html/index.html"))
	tmpl_page2 := template.Must(template.ParseFiles("html/vraipage.html"))
	tmpl_troll := template.Must(template.ParseFiles("html/troll.html"))
	tmpl_image := template.Must(template.ParseFiles("html/trollimage.html"))
	tmpl_base := template.Must(template.ParseFiles("html/base.html"))
	http.HandleFunc("/", func(w http.ResponseWriter, r *http.Request) {
		tmpl_index.Execute(w, nil)
	})
	http.HandleFunc("/soluce", func(w http.ResponseWriter, r *http.Request) {
		tmpl_image.Execute(w, nil)
	})
	http.HandleFunc("/soluce1", func(w http.ResponseWriter, r *http.Request) {
		tmpl_base.Execute(w, nil)
	})
	http.HandleFunc("/soluce2", func(w http.ResponseWriter, r *http.Request) {
		tmpl_troll.Execute(w, nil)
	})
	http.HandleFunc("/soluce4", func(w http.ResponseWriter, r *http.Request) {
		tmpl_troll.Execute(w, nil)
	})
	http.HandleFunc("/soluce3", func(w http.ResponseWriter, r *http.Request) {
		if r.Method == "POST" {
			if r.FormValue("reponse1") == "aveugle" && r.FormValue("reponse2") == "evolution" && r.FormValue("reponse3") == "riviere" && r.FormValue("reponse4") == "0.5" && r.FormValue("reponse5") == "palme" {
				t.Verif = true
			}
			if t.Verif {
				t.Ip = "rien"
				fmt.Println(t.Ip)
			}

		}
		tmpl_page2.Execute(w, t)
	})
	fs := http.FileServer(http.Dir("css"))
	http.Handle("/css/", http.StripPrefix("/css/", fs))

	http.ListenAndServe(":8080", nil)
}
