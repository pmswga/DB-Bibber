#ifndef INITCOMMAND_H
#define INITCOMMAND_H

#include "abstractcommand.h"

#include <QJsonObject>
#include <QJsonDocument>
#include <QFile>

/*!
 * \brief The InitCommand class
 */


class InitCommand : public AbstractCommand
{
    QJsonObject   connectionSection;
    QJsonObject   generalSection;
    QJsonObject   json;
    QJsonDocument doc;
    QFile         file;
    
public:
    InitCommand();
    ~InitCommand();
    
    void execute();
};

#endif
