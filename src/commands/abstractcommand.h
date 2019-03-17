#ifndef ABSTRACTCOMMAND_H
#define ABSTRACTCOMMAND_H

/*!
 * \brief The AbstractCommand class
 */

class AbstractCommand
{
public:
    AbstractCommand();
    virtual ~AbstractCommand();
    
    virtual void execute();
};

#endif // ABSTRACTCOMMAND_H
