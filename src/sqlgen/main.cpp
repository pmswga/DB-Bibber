#include "core/project.h"
#include <QTextStream>
#include <QFile>
#include <iostream>
#include <QDebug>
#include <QJsonObject>
using namespace std;

int main(int argc, char *argv[])
{
    if (argc > 1)
    {
        switch (argc) {
        case 2:
            QString filename = argv[1];

            break;
        default:
            break;
        }

    }

    setlocale(LC_ALL, "RUS");

    QByteArray json;

    QFile file("C:/OSPanel/domains/dbbibber/src/sqlgen/test.json");

    if (file.exists()) {

        if (file.open(QIODevice::ReadOnly)) {
            json = file.readAll();
        } else {
            qInfo() << file.errorString() << '\n';
        }

        file.close();
    } else {
        qInfo() << file.errorString() << '\n';

    }

    QJsonDocument doc(QJsonDocument::fromJson(json));

    qInfo() << doc.object().value("general")["type"].toString() << '\n';

}
