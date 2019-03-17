#include "core/project.h"
#include <QTextStream>
#include <QFile>
#include <QDebug>
#include <QJsonObject>
#include <iostream>
using namespace std;

int main(int argc, char *argv[])
{
    QString command = argv[1];
    Project project();
    
    if (argc > 1)
    {
        switch (argc)
        {
        case 2:
            {
                command = argv[1];
                
                if (command == "--init") {
                    QJsonObject connectionSection;
                    connectionSection["host"] = "localhost";
                    connectionSection["port"] = "";
                    connectionSection["user"] = "root";
                    connectionSection["pass"] = "";
                    
                    QJsonObject generalSection;
                    generalSection["name"] = "";
                    generalSection["descrption"] = "";
                    generalSection["author"] = "";
                    generalSection["charset"] = "utf8";
                    generalSection["type"] = "";
                    
                    
                    QJsonObject json;
                    json.insert("connection", connectionSection);
                    json.insert("general", generalSection);
                    
                    QJsonDocument doc;
                    doc.setObject(json);
                    
                    QFile file("example.json");
                    file.open(QIODevice::WriteOnly);
                    
                    if (file.isOpen()) {
                        file.write(doc.toJson());
                    }
                    
                    file.close();
                }
                
                if (command == "--help") {
                    
                }
                
                if (command == "--version") {
                    
                }
                
            } break;
        case 3:
            {
                
                QString filename = argv[1];
            } break;
        default:
            {
                cout << "Unknow command" << '\n';
            } break;
        }
    }

//    QByteArray json;

//    QFile file("C:/OSPanel/domains/dbbibber/src/sqlgen/test.json");

//    if (file.exists()) {

//        if (file.open(QIODevice::ReadOnly)) {
//            json = file.readAll();
//        } else {
//            qInfo() << file.errorString() << '\n';
//        }

//        file.close();
//    } else {
//        qInfo() << file.errorString() << '\n';

//    }

//    QJsonDocument doc(QJsonDocument::fromJson(json));

//    qInfo() << doc.object().value("general")["type"].toString() << '\n';

}
