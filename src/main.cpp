#include "commands/initcommand.h"
#include "commands/helpcommand.h"
#include <QDebug>
#include <iostream>
using namespace std;

int main(int argc, char *argv[])
{
    QString strCommand = argv[1];
    AbstractCommand *command = Q_NULLPTR;
    
    if (argc > 1)
    {
        switch (argc)
        {
        case 2:
            {
                strCommand = argv[1];
                
                if (strCommand == "--init") {
                    command = new InitCommand();
                    command->execute();
                }
                
                if (strCommand == "--help") {
                    command = new HelpCommand();
                    command->execute();
                }
                
                if (strCommand == "--version") {
                    
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
